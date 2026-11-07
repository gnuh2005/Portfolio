/* main.js - Portfolio */

function initAnimations() {
  const elements = document.querySelectorAll('.fi');

  if (!('IntersectionObserver' in window)) {
    elements.forEach(el => el.classList.add('on'));
    return;
  }

  const obs = new IntersectionObserver(
    entries => {
      entries.forEach((entry, index) => {
        if (entry.isIntersecting) {
          setTimeout(() => entry.target.classList.add('on'), index * 80);
        }
      });
    },
    { threshold: 0.1, rootMargin: '0px 0px -50px 0px' }
  );

  elements.forEach(el => obs.observe(el));

  setTimeout(() => {
    elements.forEach(el => el.classList.add('on'));
  }, 1500);
}

function initActiveNav() {
  const links = document.querySelectorAll('.nav-dot');
  const secs = document.querySelectorAll('section');

  window.addEventListener('scroll', () => {
    let cur = '';
    secs.forEach(section => {
      if (window.scrollY >= section.offsetTop - 200) cur = section.id;
    });
    links.forEach(link => {
      link.classList.toggle('active', link.getAttribute('href') === '#' + cur);
    });
  });
}

function initContactForm() {
  const form = document.getElementById('contactForm');
  if (!form) return;

  form.addEventListener('submit', async e => {
    e.preventDefault();

    const btnEl = form.querySelector('.fsend');
    const okEl = document.getElementById('form-ok');
    const errEl = document.getElementById('form-err');

    if (okEl) okEl.style.display = 'none';
    if (errEl) errEl.style.display = 'none';
    if (btnEl) {
      btnEl.disabled = true;
      btnEl.textContent = 'Đang gửi...';
    }

    const data = new FormData(form);

    try {
      const res = await fetch(form.action, {
        method: 'POST',
        body: data,
        headers: { Accept: 'application/json' },
      });
      const json = await res.json();

      if (res.ok && json.success) {
        if (okEl) okEl.style.display = 'block';
        form.reset();
        return;
      }

      if (errEl) {
        errEl.textContent = json.message || 'Gửi chưa thành công. Vui lòng thử lại sau.';
        errEl.style.display = 'block';
      }
    } catch (error) {
      if (errEl) {
        errEl.textContent = 'Không kết nối được dịch vụ gửi mail. Vui lòng thử lại sau.';
        errEl.style.display = 'block';
      }
    } finally {
      if (btnEl) {
        btnEl.disabled = false;
        btnEl.textContent = 'Gửi tin nhắn >';
      }
    }
  });
}

function initPortfolio() {
  initAnimations();
  initActiveNav();
  initContactForm();
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initPortfolio);
} else {
  initPortfolio();
}
