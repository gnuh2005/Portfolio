/* main.js – Portfolio Nguyễn Ngọc Hùng */

// ── Fade-in animation ────────────────────────────────────────────
function initAnimations() {
  const elements = document.querySelectorAll('.fi');

  if (!('IntersectionObserver' in window)) {
    elements.forEach(el => el.classList.add('on'));
    return;
  }

  const obs = new IntersectionObserver(
    (entries) => {
      entries.forEach((e, i) => {
        if (e.isIntersecting) {
          setTimeout(() => e.target.classList.add('on'), i * 80);
        }
      });
    },
    { threshold: 0.1, rootMargin: '0px 0px -50px 0px' }
  );

  elements.forEach(el => obs.observe(el));

  // Fallback: sau 1.5s hiện tất cả
  setTimeout(() => {
    elements.forEach(el => el.classList.add('on'));
  }, 1500);
}

// ── Active nav highlight khi scroll ─────────────────────────────
function initActiveNav() {
  const links = document.querySelectorAll('.nav-dot');
  const secs  = document.querySelectorAll('section');

  window.addEventListener('scroll', () => {
    let cur = '';
    secs.forEach(s => {
      if (window.scrollY >= s.offsetTop - 200) cur = s.id;
    });
    links.forEach(l => {
      l.classList.toggle('active', l.getAttribute('href') === '#' + cur);
    });
  });
}

// ── Form liên hệ (AJAX → WordPress) ─────────────────────────────
function initContactForm() {
  const form = document.getElementById('contactForm');
  if (!form) return;

  const okEl  = document.getElementById('form-ok');
  const errEl = document.getElementById('form-err');

  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const nonce   = form.querySelector('#nnh_nonce')?.value ?? '';
    const ajaxUrl = (typeof nnh_ajax !== 'undefined') ? nnh_ajax.url : '/wp-admin/admin-ajax.php';

    const body = new URLSearchParams({
      action : 'nnh_contact',
      nonce  : nonce,
      name   : form.querySelector('#fn').value,
      email  : form.querySelector('#fe').value,
      subject: form.querySelector('#fs').value,
      message: form.querySelector('#fm').value,
    });

    try {
      const res  = await fetch(ajaxUrl, { method: 'POST', body });
      const data = await res.json();

      if (data.success) {
        okEl.style.display  = 'block';
        errEl.style.display = 'none';
        form.reset();
        setTimeout(() => (okEl.style.display = 'none'), 4000);
      } else {
        errEl.textContent   = data.data?.msg ?? 'Có lỗi xảy ra.';
        errEl.style.display = 'block';
        okEl.style.display  = 'none';
      }
    } catch {
      errEl.style.display = 'block';
      okEl.style.display  = 'none';
    }
  });
}

// ── Khởi động ────────────────────────────────────────────────────
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', () => {
    initAnimations();
    initActiveNav();
    initContactForm();
  });
} else {
  initAnimations();
  initActiveNav();
  initContactForm();
}