<?php
// Check if the cookie has been set
if (!isset($_COOKIE['accept_cookies'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accept_cookies'])) {
        // Set a cookie for user acceptance
        setcookie('accept_cookies', 'true', time() + (86400 * 30), "/"); // Cookie valid for 30 days
        header("Location: " . $_SERVER['PHP_SELF']); // Reload the page to hide the banner
        exit;
    }
}
?>
<?php if (!isset($_COOKIE['accept_cookies'])): ?>
    <div id="cookie-banner">
        <p>We use cookies to enhance your experience. By continuing to visit this site, you agree to our use of cookies.</p>
        <form method="post" style="display: inline;">
            <button type="submit" name="accept_cookies" class="btn-primary">Accept</button>
        </form>
    </div>
<?php endif; ?>
