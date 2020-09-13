<?php

/**
 * Displays a list with links to social networks
 * 
 * PHP version 7.3
 * 
 * @param array $link Array of links to the user's social networks
 * @param array $settings Array with function settings
 * @author DmitryMirkotan <DmitryMirkotan@gmail.com>
 * @version 2.0
 * @link https://github.com/DmitryMirkotan
 */
class Social {

    public function __construct($links, $settings) {

        // We get an array with the user's social media links
        $this->links = $links;

        // We get settings
        $this->icon         = $settings['icon'];
        $this->a_classes    = $settings['a_classes'];
        $this->ul_classes   = $settings['ul_classes'];
        $this->li_classes   = $settings['li_classes'];
        $this->name         = $settings['social_name'];
        $this->span_classes = $settings['span_classes'];
        $this->prefix       = $settings['prefix'] ? $settings['prefix'] : "social";
        $this->icon_size    = $settings['icon_size'] ? " fa-" . $settings['icon_size'] : "";

    }

    // Get the site name from the link
    private function getSiteName($url) {
        
        $url = strtolower(trim($url));
        $url = preg_replace('%^(http:\/\/)*(https:\/\/)*(ftp:\/\/)*(www.)*%usi', '', $url);
        $url = preg_replace('%\/.*$%usi' , '', $url);
        
        return $url;
        
    }

    // Returns the Font Awesome icon class for the link
    private function getSocialIcon($url) {

        // Get the site name
        $site_name = $this->getSiteName($url);
        
        // List of Font Awesome icon classes for each social network and the name of the social networks
        $social_icons = array(
            "twitter.com"    => [" fab fa-twitter ", "Twitter"],
            "telegram.com"   => [" fab fa-telegram-plane ", "Telegram"],
            'vk.com'         => [" fab fa-vk ", "VK"],
            "reddit.com"     => [" fab fa-reddit-alien" , "Reddit"],
            "ok.ru"          => [" fab fa-odnoklassniki ", "OK"],
            "facebook.com"   => [" fab fa-facebook-f ", "Facebook"],
            "youtube.com"    => [" fab fa-youtube ", "Youtube"],
            "instagram.com"  => [" fab fa-instagram ", "Instagram"],
            "pinterest.com"  => [" fab fa-pinterest-p ", "Pinterest"],
            "linkedin.com"   => [" fab fa-linkedin-in ", "Linkedin"],
            "tiktok.com"     => [" fab fa-tiktok ", "TikTok"],
            "github.com"     => [" fab fa-github-alt ", "Github"],
            "behance.net"    => [" fab fa-behance", "Behance"],
            "deviantart.com" => [" fab fa-deviantart", "Deviantart"],
            "digg.com"       => [" fab fa-digg", "Digg"],
            "flickr.com"     => [" fab fa-flickr", "Flickr"],
            "last.fm"        => [" fab fa-lastfm", "Last FM"],
            "dribbble.com"   => [" fab fa-dribbble", "Dribbble"],
            "soundcloud.com" => [" fab fa-soundcloud", "Soundcloud"],
            "tumblr.com"     => [" fab fa-tumblr", "Tumblr"],
            "vimeo.com"      => [" fab fa-vimeo-v", "Vimeo"],
        );

        // If the icon exists, return it; otherwise, return the planet (internet) icon
        return  ($social_icons[$site_name]) ? $social_icons[$site_name] : [" fas fa-globe-americas", ""];

    }

    // Displays a list with links to social networks
    public function getSocialList() { ?>
        <ul class="<?php echo $this->ul_classes; ?>">
            <?php for ( $i = 0; $i <= count($this->links) - 1; $i++) {
                $social = $this->getSocialIcon( $this->links[$i] );
                $icon   = $social[0];
                $name   = $social[1];
                ?><li class="<?php echo esc_attr($this->li_classes, $this->prefix); ?>">
                    <a href="<?php echo esc_url($this->links[$i], $this->prefix); ?>" class="<?php echo esc_attr($this->a_classes, $this->prefix); ?>">
                        <?php if ($this->icon) { ?>
                            <i class="<?php echo esc_attr($icon . $this->icon_size, $this->prefix); ?>"></i>
                        <?php } ?>
                        <?php if ($this->name) { ?>
                            <span class="<?php echo esc_attr($this->span_classes, $this->prefix); ?>">
                                <?php echo esc_attr($name, $this->prefix); ?>
                            </span>
                        <?php } ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    <?php }

}