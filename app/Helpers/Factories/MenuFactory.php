<?php

class MenuFactory
{
    public function __construct($content_)
    {
        echo '
        <nav id="menu">
            <ul class="list">
                ' . implode('', $content_) . '
            </ul>
        </nav>
        ';
    }

    public static function newGenericButton($href_, $icon_, $value_)
    {
        return '
        <li class="list_item">
            <a class="item_link" href="' . $href_ . '">
                <i class="item_icon ' . $icon_ . '"></i>
                ' . $value_ . '
            </a>
        </li>
        ';
    }

    public static function newProfileButton($userName_)
    {
        return '
        <li id="list_item-profile">
            <a class="item_link" href="#">
                <i id="icon-profile" class="fa-solid fa-circle-user"></i>
                <span>
                    <p>Bem-vindo</p>
                    <p id="profile-name">' . explode(' ', $userName_)[0] . '</p>
                <span>
            </a> 
       </li>
        ';
    }

    public static function newDropdownButton($href_, $icon_, $value_, $content_)
    {
        return '
        <li>
            <div class="list_item item_dropdown">
            <i class="item_icon ' . $icon_ . '"></i>
            ' . $value_ . '
            <i class="dropdown-arrow fa-solid fa-chevron-left"></i>
            </div>
            <ul class="list">
                ' . implode('', $content_) . '
            </ul>
        </li>
        ';
    }
}
