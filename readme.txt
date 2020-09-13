=== Social ===

Author: Dmitry Mirkotan <DmitryMirkotan@gmail.com>

Tested up to: 7
Requires PHP: 7.3
Version: 2.0

== Description ==

Social - is a class that receives an array with links to social networks,
 and returns a list with icons, a name and a link to each social network.

== Using ==

Using Example:
    // Array user social links
    $links = array(
        "https://twitter.com/DmitryMirkotan",
        "https://www.youtube.com/watch?v=9CltfnAVECg",
        "https://github.com/DmitryMirkotan",
    );

    // Settiongs
    $my_social = new Social($links, array(
        "ul_classes"   => "my_social ", // Classes for the tag "ul"
        "li_classes"   => "social",     // Classes for the tag "li"
        "a_classes"    => "link",       // Classes for the tag "a"
        "span_classes" => "Span",       // Classes for the tag "span"
        "icon"         => true,         // Show font awesome icon? True - yes, false - no
        "icon_size"    => "2x",         // How icon size using (min: 1x; max: 10x)
        "social_name"  => true,         // Show social name? True - yes, false - no
    ));

    // Lists social networks
    $my_social->getSocialList();

== Vercion 2.0 ==

The number of supported social networks has been increased to 20. Increased
security thanks to the use of the esc _attr and esc _url functions, but 
because of this, the use of the class is possible only for the CMS system
Word Press.