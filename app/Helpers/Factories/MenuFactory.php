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
                <img src="./img/icons/' . $icon_ . '.svg" class="item_icon">
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
                <img src="./img/icons/circle-user-solid.svg" class="profile_icon">
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
            <img src="./img/icons/' . $icon_ . '.svg" class="item_icon">
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
