<?php
/**
 * index.php – Template chính (trang chủ portfolio)
 */
get_header();

// Lấy thông tin từ Customizer (có fallback mặc định)
$hero_name = get_theme_mod( 'nnh_hero_name', 'Nguyễn Ngọc Hùng' );
$hero_role = get_theme_mod( 'nnh_hero_role', 'Frontend Developer' );
$hero_bio  = get_theme_mod( 'nnh_hero_bio',  'Sinh viên Công nghệ Thông tin tại Trường Đại học Tây Nguyên. Đam mê xây dựng giao diện web đẹp, thân thiện và có trải nghiệm người dùng tốt.' );

$email    = get_theme_mod( 'nnh_email',    'nnh08072005@gmail.com' );
$github   = get_theme_mod( 'nnh_github',   'https://github.com/gnuh2005' );
$facebook = get_theme_mod( 'nnh_facebook', 'https://www.facebook.com/gnuh.2005/' );
$address  = get_theme_mod( 'nnh_address',  '245 Trần Nhân Tông,Thành Phố Buôn Ma Thuột, Đắk Lắk' );

// Tách tên thành phần: "Nguyễn Ngọc Hùng" → "Nguyễn Ngọc" + "Hùng"
$name_parts = explode( ' ', trim( $hero_name ) );
$last_name  = array_pop( $name_parts );
$first_part = implode( ' ', $name_parts );

// Tạo chữ viết tắt avatar (lấy chữ cái đầu mỗi từ, tối đa 3)
$initials = '';
foreach ( explode( ' ', $hero_name ) as $w ) {
    $initials .= mb_strtoupper( mb_substr( $w, 0, 1 ) );
}
$initials = mb_substr( $initials, 0, 3 );
?>

<!-- ════════════════════════════════════════════
     01 · HOME
═════════════════════════════════════════════ -->
<section id="home">
  <div class="deco deco1"></div>
  <div class="deco deco2"></div>
  <div class="deco deco3"></div>

  <div class="hero-left">
    <div class="hero-tag">
  <span class="dot"></span>

  <svg width="16" height="16" viewBox="0 0 24 24"
       fill="none" stroke="currentColor"
       stroke-width="2"
       style="margin-right:6px; vertical-align:middle;">
    <path d="M3 5h18v12H3z"/>
    <path d="M8 21h8"/>
  </svg>

  <?php echo esc_html( $hero_role ); ?>
</div>

    <h1 class="name">
      <?php echo esc_html( $first_part ); ?><br>
      <?php
        // Hiển thị tất cả trừ từ cuối, từ cuối in nghiêng màu xanh
        if ( $first_part ) {
            // Từ cuối cùng đã được tách ở trên ($last_name)
        }
      ?>
      <?php echo esc_html( implode( ' ', array_slice( explode( ' ', $hero_name ), count( $name_parts ) - 0, -1 ) ) ); ?>
      <em><?php echo esc_html( $last_name ); ?></em>
    </h1>

    <p class="hero-sub"><?php echo esc_html( $hero_bio ); ?></p>

    <div class="cta-row">
      <a href="#projects" class="btn-fill">Xem dự án</a>
      <a href="#contact"  class="btn-ghost">Liên hệ tôi</a>
    </div>
  </div><!-- /.hero-left -->

  <div class="hero-right">
    <div class="avatar-card">
      <div class="avatar-ring">
         <img src="<?php echo get_template_directory_uri(); ?>/images/avatar.jpg"alt="Avatar"
    class="avatar-img">
        </div>
      <div class="aname"><?php echo esc_html( $hero_name ); ?></div>
      <div class="arole"><?php echo esc_html( $hero_role ); ?></div>
    </div>

    <div class="stat-row">
      <div class="stat-box"><div class="num">3+</div><div class="lbl">Dự án</div></div>
      <div class="stat-box"><div class="num">2+</div><div class="lbl">Năm học</div></div>
      <div class="stat-box"><div class="num">5+</div><div class="lbl">Kỹ năng</div></div>
      <div class="stat-box"><div class="num">100%</div><div class="lbl">Nhiệt huyết</div></div>
    </div>
  </div><!-- /.hero-right -->
</section>


<!-- ════════════════════════════════════════════
     02 · RESUME
═════════════════════════════════════════════ -->
<section id="resume">
  <div class="sec-label fi">02 · About</div>
  <div class="sec-title fi">Kỹ năng &amp; <span>Học vấn</span></div>

  <div class="bento">

    <!-- Học vấn -->
    <div class="bento-card fi">
      <h3>Học vấn</h3>
      <div class="edu-school">Đại học Tây Nguyên</div>
      <div class="edu-major">Công nghệ Thông tin</div>
      <span class="edu-pill">2022 – Hiện tại</span>
    </div>

    <!-- Kỹ năng lập trình -->
    <div class="bento-card wide fi">
      <h3>Kỹ năng lập trình &amp; Công cụ</h3>
      <div class="chip-wrap">
        <?php
        $skills = [ 'HTML5', 'CSS3', 'JavaScript', 'Git', 'GitHub', 'Responsive Design', 'WordPress', 'VSCode' ];
        foreach ( $skills as $skill ) {
            echo '<span class="chip">' . esc_html( $skill ) . '</span>';
        }
        ?>
      </div>
    </div>

    <!-- Định hướng nghề nghiệp -->
    <div class="bento-card fi">
      <h3>Định hướng nghề nghiệp</h3>
      <ul class="goal-list">
        <li>Frontend Developer – xây dựng UI/UX chất lượng cao</li>
        <li>Làm chủ React / Vue.js trong tương lai gần</li>
        <li>Hướng tới Full Stack Developer dài hạn</li>
      </ul>
    </div>

    <!-- Kỹ năng mềm -->
    <div class="bento-card fi">
      <h3>Kỹ năng mềm</h3>
      <div class="chip-wrap">
        <?php
        $soft = [ 'Tư duy sáng tạo', 'Teamwork', 'Problem Solving', 'Tự học' ];
        foreach ( $soft as $s ) {
            echo '<span class="chip">' . esc_html( $s ) . '</span>';
        }
        ?>
      </div>
    </div>

    <!-- Ngôn ngữ -->
    <div class="bento-card fi">
      <h3>Ngôn ngữ</h3>
      <div class="chip-wrap">
        <span class="chip">Tiếng Việt (Native)</span>
        <span class="chip">English (Cơ bản)</span>
      </div>
    </div>

  </div><!-- /.bento -->
</section>


<!-- ════════════════════════════════════════════
     03 · PROJECTS
═════════════════════════════════════════════ -->
<section id="projects">
  <div class="sec-label fi">03 · Portfolio</div>
  <div class="sec-title fi">Dự án <span>nổi bật</span></div>

  <div class="proj-grid">
    <?php
    // Dữ liệu các dự án – bạn có thể chuyển sang Custom Post Type sau
    $projects = [
  [
    'img'   => get_template_directory_uri() . '/images/project1.jpg',
    'chips' => [ 'HTML', 'CSS', 'JS', 'Game Design', 'PHP' ],
    'name'  => 'Environment Game',
    'desc'  => 'Dự án xây dựng một mini game giáo dục nhằm nâng cao ý thức bảo vệ môi trường cho người chơi thông qua các hoạt động tương tác như phân loại rác, thu gom rác thải và xử lý ô nhiễm.',
    'link'  => 'https://github.com/gnuh2005/environment-game',
  ],
  [
    'img'   => get_template_directory_uri() . '/images/project2.jpg',
    'chips' => [ 'C++', 'Game 2D' ],
    'name'  => 'Running Man',
    'desc'  => 'Dự án xây dựng một trò chơi dạng endless runner (chạy vô tận) lấy cảm hứng từ mini game khi mất mạng trên trình duyệt Chrome Dino của Google. Trong game, người chơi điều khiển nhân vật chạy liên tục và phải né các chướng ngại vật bằng cách nhảy hoặc cúi xuống.

Game được thiết kế nhằm rèn luyện phản xạ nhanh, tăng độ tập trung và mang tính giải trí cao với cơ chế tăng tốc độ theo thời gian.',
    'link'  => 'https://github.com/gnuh2005/runningman',
  ],
  [
    'img'   => get_template_directory_uri() . '/images/project3.jpg',
    'chips' => [ 'C++', 'SDL2.0' ],
    'name'  => 'Snake Game',
    'desc'  => 'Dự án xây dựng trò chơi rắn săn mồi cổ điển, lấy cảm hứng từ game Snake. Trong game, người chơi điều khiển con rắn di chuyển trên màn hình để ăn thức ăn và tăng chiều dài. Trò chơi kết thúc khi rắn va chạm với tường hoặc chính cơ thể của mình.',
    'link'  => 'https://github.com/gnuh2005/Snake-Game',
  ],
];

    foreach ( $projects as $proj ) : ?>
    <div class="proj-card fi">
      <div class="proj-thumb">
  <?php if ( ! empty( $proj['img'] ) ) : ?>
    <img
      src="<?php echo esc_url( $proj['img'] ); ?>"
      alt="<?php echo esc_attr( $proj['name'] ); ?>"
      class="proj-thumb-img"
      loading="lazy"
    >
  <?php else : ?>
    <span style="font-size:3rem;">🌐</span>
  <?php endif; ?>
</div>
      <div class="proj-body">
        <div class="proj-chips">
          <?php foreach ( $proj['chips'] as $chip ) : ?>
            <span class="proj-chip"><?php echo esc_html( $chip ); ?></span>
          <?php endforeach; ?>
        </div>
        <h3 class="proj-name"><?php echo esc_html( $proj['name'] ); ?></h3>
        <p class="proj-desc"><?php echo esc_html( $proj['desc'] ); ?></p>
        <a href="<?php echo esc_url( $proj['link'] ); ?>" class="proj-link" target="_blank" rel="noopener">
          &#128279; Xem GitHub
        </a>
      </div>
    </div>
    <?php endforeach; ?>
  </div><!-- /.proj-grid -->
</section>


<!-- ════════════════════════════════════════════
     04 · CONTACT
═════════════════════════════════════════════ -->
<section id="contact">
  <div class="sec-label fi">04 · Contact</div>
  <div class="sec-title fi">Liên <span>hệ</span></div>

  <div class="contact-wrap">

    <!-- Cột trái: thông tin -->
    <div class="contact-left fi">
      <p>Mình luôn sẵn sàng lắng nghe những cơ hội hợp tác, thực tập hoặc dự án thú vị. Hãy nhắn tin cho mình nhé!</p>

      <div class="c-item">
        <div class="c-icon">&#128140;</div>
        <div>
          <div class="c-lbl">Email</div>
          <div class="c-val">
            <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
          </div>
        </div>
      </div>

      <div class="c-item">
        <div class="c-icon">&#128025;</div>
        <div>
          <div class="c-lbl">GitHub</div>
          <div class="c-val">
            <a href="<?php echo esc_url( $github ); ?>" target="_blank" rel="noopener">
              <?php echo esc_html( str_replace( 'https://', '', $github ) ); ?>
            </a>
          </div>
        </div>
      </div>

      <div class="c-item">
        <div class="c-icon">&#127968;</div>
        <div>
          <div class="c-lbl">Địa chỉ</div>
          <div class="c-val"><?php echo esc_html( $address ); ?></div>
        </div>
      </div>

      <div class="socials">
        <div class="socials">
  <a href="<?php echo esc_url( $github ); ?>" class="soc" target="_blank" rel="noopener">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="vertical-align:middle;margin-right:5px">
      <path d="M12 2C6.477 2 2 6.477 2 12c0 4.418 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.009-.868-.013-1.703-2.782.604-3.369-1.34-3.369-1.34-.454-1.156-1.11-1.463-1.11-1.463-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.578 9.578 0 0112 6.836a9.59 9.59 0 012.504.337c1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.741 0 .267.18.578.688.48C19.138 20.163 22 16.418 22 12c0-5.523-4.477-10-10-10z"/>
    </svg>
    GitHub
  </a>
  <a href="<?php echo esc_url( $facebook ); ?>" class="soc" target="_blank" rel="noopener">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="vertical-align:middle;margin-right:5px">
      <path d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.41c0-3.025 1.792-4.697 4.533-4.697 1.312 0 2.686.235 2.686.235v2.97h-1.513c-1.491 0-1.956.93-1.956 1.874v2.25h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z"/>
    </svg>
    Facebook
  </a>
</div>
      </div>

      <div class="map-wrap">
        <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3893.067537311874!2d108.000914!3d12.643574099999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31721dd4abef9ced%3A0x611aa9ee7b2ea734!2zMjQ1IFRy4bqnbiBOaMOibiBUw7RuZywgS2jDoW5oIFh1w6JuLCBUaMOgbmggTmjhuqV0LCDEkOG6r2sgTOG6r2ssIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1775822473209!5m2!1svi!2s"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        title="Bản đồ Buôn Ma Thuột"
></iframe>
      </div>
    </div><!-- /.contact-left -->

    <!-- Cột phải: form liên hệ -->
    <div class="fi">
      <form class="cform" id="contactForm" novalidate>
        <?php wp_nonce_field( 'nnh_contact_nonce', 'nnh_nonce' ); ?>

        <div class="frow">
          <div class="fg">
            <label for="fn">Họ tên</label>
            <input type="text" id="fn" name="name" placeholder="Nhập họ tên" required>
          </div>
          <div class="fg">
            <label for="fe">Email</label>
            <input type="email" id="fe" name="email" placeholder="email@example.com" required>
          </div>
        </div>

        <div class="fg">
          <label for="fs">Chủ đề</label>
          <input type="text" id="fs" name="subject" placeholder="Chủ đề liên hệ">
        </div>

        <div class="fg">
          <label for="fm">Nội dung</label>
          <textarea id="fm" name="message" rows="5" placeholder="Nội dung tin nhắn..." required></textarea>
        </div>

        <button type="submit" class="fsend">Gửi tin nhắn &#10148;</button>

        <p id="form-ok"  style="color:var(--b500);font-size:.87rem;display:none;margin-top:.5rem">&#10003; Đã gửi thành công!</p>
        <p id="form-err" style="color:#e05a5a;font-size:.87rem;display:none;margin-top:.5rem">&#10007; Có lỗi xảy ra. Vui lòng thử lại.</p>
      </form>
    </div>

  </div><!-- /.contact-wrap -->
</section>
<!-- ════════════════════════════════════════════
     05 · BANNER QUẢNG CÁO
═════════════════════════════════════════════ -->
<section id="banner" class="banner-section">
  <div class="cpp-banner fi">

    <div class="cpp-deco cpp-deco1"></div>
    <div class="cpp-deco cpp-deco2"></div>
    <div class="cpp-deco cpp-deco3"></div>

    <div class="cpp-left">
      <div class="cpp-badge">
        <span class="cpp-badge-dot"></span>
        Khóa học mới 2025
      </div>
      <h2 class="cpp-title">Lập trình <span>C++</span><br>cho người mới bắt đầu</h2>
      <p class="cpp-sub">Từ zero đến hero — học C++ từ cơ bản đến nâng cao, xây dựng nền tảng vững chắc cho sự nghiệp lập trình viên.</p>
      <div class="cpp-features">
        <span class="cpp-feat">✓ 50+ bài học video</span>
        <span class="cpp-feat">✓ Bài tập thực hành</span>
        <span class="cpp-feat">✓ Chứng chỉ hoàn thành</span>
        <span class="cpp-feat">✓ Hỗ trợ 1-1</span>
      </div>
      <div class="cpp-cta">
        <a href="#" class="cpp-btn-main">Đăng ký ngay</a>
        <a href="#" class="cpp-btn-ghost">Xem chương trình</a>
        <span class="cpp-free">✦ Miễn phí tuần đầu</span>
      </div>
    </div>

    <div class="cpp-right">
      <div class="cpp-code-card">
        <div class="cpp-code-dots">
          <span class="cd-r"></span>
          <span class="cd-y"></span>
          <span class="cd-g"></span>
        </div>
        <div class="cpp-code-body">
          <div><span class="ck">#include</span> <span class="cs">&lt;iostream&gt;</span></div>
          <div><span class="ck">using namespace</span> <span class="ct">std;</span></div>
          <div class="mt4"><span class="ck">int</span> <span class="cf">main</span><span class="ct">() {</span></div>
          <div class="pl"><span class="ct">cout</span> <span class="ck">&lt;&lt;</span> <span class="cs">"Hello C++"</span><span class="ct">;</span></div>
          <div class="pl"><span class="ck">return</span> <span class="cn">0</span><span class="ct">;</span></div>
          <div><span class="ct">}</span></div>
          <div class="mt4"><span class="cm">// Output: Hello C++</span></div>
        </div>
      </div>
      <div class="cpp-students">500+ học viên</div>
    </div>

  </div>
</section>
<?php get_footer(); ?>