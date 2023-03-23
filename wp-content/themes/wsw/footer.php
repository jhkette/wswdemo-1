<div class="container-footer">
        <footer role="contentinfo">
          <div>
            <nav class="footer" role="navigation">
            <h3>Information</h3>
              <ul>
                <li><a href="<?php echo esc_url(
                	site_url('/calender')
                ); ?>">Calender</a></li>
                <li><a href="<?php echo esc_url(
                	site_url('/contact')
                ); ?>">Contact</a></li>
                <li><a href="<?php echo esc_url(
                	site_url('/join')
                ); ?>">Join Us</a></li>
              </ul>
            </nav>
          </div>
          <div>
           
            <nav class="footer" role="navigation">
            <h3>Social</h3>
              <ul>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Strava</a></li>
                <li><a href="#">Facebook</a></li>
              </ul>
            </nav>
          </div>
        </footer>
     
      </div>
      <?php wp_footer(); ?>
  </body>
</html>

