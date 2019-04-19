<?php

namespace Cyve\TwigExtensions;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class FontAwesomeExtension extends AbstractExtension
{
    /**
     * @return array
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('fa', [$this, 'getFaClassFromUrl']),
        ];
    }

    /**
     * @param string $url
     * @return string
     */
    public function getFaClassFromUrl(string $url): string
    {
        if(preg_match("/facebook.com/i", $url)) return 'fa-facebook';
        if(preg_match("/twitter.com/i", $url)) return 'fa-twitter';
        if(preg_match("/plus.google.com/i", $url)) return 'fa-google-plus';
        if(preg_match("/instagram.com/i", $url)) return 'fa-instagram';
        if(preg_match("/snapchat.com/i", $url)) return 'fa-snapchat-ghost';
        if(preg_match("/whatsapp.com/i", $url)) return 'fa-whatsapp';
        if(preg_match("/youtube.com/i", $url)) return 'fa-youtube';
        if(preg_match("/vimeo.com/i", $url)) return 'fa-vimeo';
        if(preg_match("/dailymotion.com/i", $url)) return 'fa-video-camera';
        if(preg_match("/soundcloud.com/i", $url)) return 'fa-soundcloud';
        if(preg_match("/spotify.com/i", $url)) return 'fa-spotify';
        if(preg_match("/deezer.com/i", $url)) return 'fa-music';
        if(preg_match("/tidal.com/i", $url)) return 'fa-music';
        if(preg_match("/play.google.com/i", $url)) return 'fa-google';
        if(preg_match("/itunes.apple.com/i", $url)) return 'fa-apple';
        if(preg_match("/amazon.(fr|com)/i", $url)) return 'fa-amazon';
        if(preg_match("/bandcamp.com/i", $url)) return 'fa-bandcamp';
        return 'fa-link';
    }
}
