<?php

class BrowserDetect
{
    public $userAgent;

    /*
     * use the x and y variables inherited from Point.php.
     */
    public function __construct($userAgentString)
    {
        $this->userAgent = $userAgentString;
    }

    /*
     * the (String) representation of this Point as "Point3D(x, y, z)".
     */
    public function __toString()
    {
        return $this->userAgent;
    }

    function get_browser_name()
    {
        if (strpos($this->userAgent, 'Opera') || strpos($user_agent, 'OPR/')) return 'opera';
        elseif (strpos($this->userAgent, 'Edge')) return 'edge';
        elseif (strpos($this->userAgent, 'Chrome')) return 'chrome';
        elseif (strpos($this->userAgent, 'Safari')) return 'safari';
        elseif (strpos($this->userAgent, 'Firefox')) return 'firefox';
        elseif (strpos($this->userAgent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'ie';
        
        return 'Other';
    }
}
