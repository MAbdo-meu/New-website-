<?php
/* shared navigation — jhu-top + tab rail + slide-in panel */
$P = ($lang === 'ar') ? '/ar' : '';
$here = ($slug === 'index' || $slug === '') ? '' : '/'.$slug;
$OTHER = ($lang === 'ar') ? ($here === '' ? '/' : $here) : '/ar'.($here === '' ? '/' : $here);
$OTHERLABEL = ($lang === 'ar') ? 'English' : 'العربية';
?>
<div class="jhu-top">
    <div class="row" style="width:100%;padding:0 34px">
      <a class="jhu-brand" href="<?= $P ?>/"><img
          src="/assets/meu-logo.png" alt="Middle East University"></a>
      <div class="jhu-tabs">
        <div class="grp1">
          <button class="tab tab-main" onclick="openPane('menu')"><svg viewBox="0 0 24 24">
              <line x1="3" y1="6" x2="21" y2="6" />
              <line x1="3" y1="12" x2="21" y2="12" />
              <line x1="3" y1="18" x2="21" y2="18" />
            </svg><span>Menu</span></button>
          <button class="tab tab-main" onclick="openPane('news')"><svg viewBox="0 0 24 24">
              <rect x="3" y="4" width="18" height="17" rx="2" />
              <line x1="3" y1="9" x2="21" y2="9" />
              <line x1="8" y1="2" x2="8" y2="6" />
              <line x1="16" y1="2" x2="16" y2="6" />
            </svg><span>News</span></button>
          <a class="tab tab-main" href="<?= $P ?>/media/meu-pulse"><svg viewBox="0 0 24 24">
              <path d="M3 12h4l2-7 4 14 2-7h6" />
            </svg><span>MEU Pulse</span></a>
          <button class="tab tab-main" onclick="openPane('search')"><svg viewBox="0 0 24 24">
              <circle cx="11" cy="11" r="7" />
              <line x1="21" y1="21" x2="16.5" y2="16.5" />
            </svg><span>Search</span></button>
        </div>
        <div class="grp2">
          <a class="tab tab-sub" data-i="A" href="<?= $P ?>/uk/uk-apply"><span>Apply</span></a>
          <a class="tab tab-sub" data-i="U" href="https://ukdegrees.meu.edu.jo/newsite/"><span>UK Degrees MEU</span></a>
          <a class="tab tab-sub" data-i="P" href="<?= $P ?>/academics/programs"><span>Programmes</span></a>


          <button type="button" class="tab tab-sub tab-lang" data-i="<?= $lang==='ar'?'EN':'ع' ?>" id="langTab" onclick="location.href='<?= htmlspecialchars($OTHER, ENT_QUOTES) ?>'"
            aria-label="<?= $lang==='ar'?'Switch to English':'التبديل إلى العربية' ?>"><span id="langTabLabel" lang="<?= $lang==='ar'?'en':'ar' ?>"><?= $OTHERLABEL ?></span></button>
        </div>
      </div>
    </div>
  </div>
  <button class="jhu-burger" type="button" aria-label="Menu" onclick="openPane('menu')"><svg viewBox="0 0 24 24"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg></button>
  <div class="shade" id="shade" onclick="closePane()"></div>
  <aside class="sidep" id="sidep" aria-hidden="true">
    <div class="pane pane-menu on" id="pane-menu">
      <div class="ptitle">Explore MEU</div>
      <a href="<?= $P ?>/about/meu-in-words">About</a><a href="<?= $P ?>/academics/programs">Faculties</a><a
        href="<?= $P ?>/admission/admission">Admissions</a><a href="../admission/admission.html#sch">Scholarships</a><a
        href="https://ukdegrees.meu.edu.jo/newsite/">UK Degrees</a><a href="<?= $P ?>/about/campus">Student Life</a><a
        href="<?= $P ?>/about/meu-map">Our Campus</a><a href="<?= $P ?>/student-affairs/deanship-students-affairs">Deanships</a><a
        href="<?= $P ?>/centers/centers-institutes">Centers &amp; Institutions</a>
      <div class="grp">
        <h6>Quick Links</h6><a class="sub" href="<?= $P ?>/academics/programs">Programme Finder</a><a class="sub"
          href="<?= $P ?>/admission/ug-requirements">Admission Requirements</a><a class="sub"
          href="../admission/admission.html#sch">Scholarships</a><a class="sub" href="<?= $P ?>/admission/fees">Fees</a><a
          class="sub" href="<?= $P ?>/admission/epayment">e-Payments</a><a class="sub" href="<?= $P ?>/about/meu-map">Maps &
          Directions</a><a class="sub" href="<?= $P ?>/about/contact">Contact Us</a>
      </div>

      <div class="grp">
        <h6>Portals</h6><a class="sub" href="https://www.meu.edu.jo/student-portal/" target="_blank"
          rel="noopener">Student Portal ↗</a><a class="sub" href="https://mymeu.meu.edu.jo/" target="_blank"
          rel="noopener">Staff Portal ↗</a><a class="sub" href="https://reg.meu.edu.jo/" target="_blank"
          rel="noopener">EduGate ↗</a><a class="sub" href="http://elearning.meu.edu.jo/" target="_blank"
          rel="noopener">E-Learning ↗</a>
      </div>
      <button class="pclose" onclick="closePane()">Close Menu</button>
    </div>
    <div class="pane pane-search" id="pane-search">
      <div class="ptitle">Search</div>
      <input type="text" placeholder="Search MEU…" aria-label="Search">
      <button class="sbtn">Search</button>
      <div class="cs">Common Searches</div>
      <div class="cslist"><a href="<?= $P ?>/admission/admission">Admission Requirements</a><a
          href="<?= $P ?>/admission/fees">Tuition & Fees</a><a href="../admission/admission.html#cal">Academic Calendar</a><a
          href="<?= $P ?>/academics/programs">Faculties & Programmes</a><a href="<?= $P ?>/uk/uk-about">UK Degrees</a><a
          href="<?= $P ?>/admission/admission">Apply Now</a></div>
      <button class="pclose" onclick="closePane()">Close Menu</button>
    </div>
    <div class="pane pane-news" id="pane-news">
      <div class="ptitle">News & Events</div>
      <h6>Recent News</h6>
      <div class="news-it">
        <div class="th"
          style="background-image:url('../assets/news-youth.jpg')">
        </div>
        <div class="nx">
          <p>Minister of Youth Visits MEU — The Minister of Youth joins MEU to discuss empowering the next generation.
          </p>
          <div class="meta">2 days ago</div>
        </div>
      </div>
      <div class="news-it">
        <div class="th"
          style="background-image:url('../assets/news-film.jpg')">
        </div>
        <div class="nx">
          <p>MEU Short Film Festival — The Minister of Culture crowns the winners at this year's festival.</p>
          <div class="meta">6 days ago</div>
        </div>
      </div>
      <div class="news-it">
        <div class="th"
          style="background-image:url('../assets/news-genetic.jpg')">
        </div>
        <div class="nx">
          <p>New: Genetic Engineering & Biotech — MEU launches a forward-looking degree in the science of medicine's
            future.</p>
          <div class="meta">2 weeks ago</div>
        </div>
      </div>
      <h6 class="mt">Upcoming Events</h6>
      <div class="news-it">
        <div class="th"
          style="background-image:url('../assets/news-openday.jpg')">
        </div>
        <div class="nx">
          <p>Open Day — Amman Campus — Tour faculties, meet staff, and explore student life.</p>
          <div class="meta">24 Jun 2026</div>
        </div>
      </div>
      <div class="news-it">
        <div class="th"
          style="background-image:url('../assets/news-emergency.jpg')">
        </div>
        <div class="nx">
          <p>Paramedical & Emergency Info Session — Learn about MEU's newest health-sciences programme.</p>
          <div class="meta">2 Jul 2026</div>
        </div>
      </div>
      <button class="pclose" onclick="closePane()">Close Menu</button>
      <div class="social"><a href="#">X</a><a href="#">Facebook</a><a href="#">LinkedIn</a><a href="#">Instagram</a>
      </div>
    </div>
  </aside>
