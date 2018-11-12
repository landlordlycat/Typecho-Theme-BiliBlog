<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题后加上一个 LOGO'));
    $userboxpic = new Typecho_Widget_Helper_Form_Element_Text('userboxpic', NULL, 'https://i.loli.net/2018/10/19/5bc945e7ef153.png', _t('用户标签栏头部图片'), _t('在这里填入一个图片 URL 地址, 以在网站用户头像上加一个头图'));
    $userboxhead = new Typecho_Widget_Helper_Form_Element_Text('userboxhead', NULL, 'https://gravatar.loli.net/avatar/17842af77c9727c64e6468ad6d9d3f96', _t('用户头像'), _t('在这里填入一个图片 URL 地址, 以显示用户头像'));
    $favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', NULL, 'https://i.loli.net/2018/10/26/5bd270b485abb.png', _t('站标'), _t('在这里填入一个图片 URL 地址, 以显示网站图标'));
    $musicindex = new Typecho_Widget_Helper_Form_Element_Text('musicindex', NULL, 'https://music.163.com/#/user/home?id=87888813', _t('网易云音乐首页'), _t('在这里填入一个 URL 地址, 以跳转网易云音乐个人主页'));
    $bilibiliindex = new Typecho_Widget_Helper_Form_Element_Text('bilibiliindex', NULL, 'https://space.bilibili.com/2645858/#/', _t('哔哩哔哩空间主页'), _t('在这里填入一个 URL 地址, 以跳转哔哩哔哩空间主页'));
    $apid= new Typecho_Widget_Helper_Form_Element_Text('apid', NULL, '100845969', _t('网易云音乐id'), _t('在这里填入id数字, 以播放网易云音乐歌单'));
    $Keywords= new Typecho_Widget_Helper_Form_Element_Text('Keywords', NULL, 'menhood,援军,个人博客,影视,后期', _t('Keywords'), _t('在这里填入Keywords, 用英文逗号隔开'));
    $Description= new Typecho_Widget_Helper_Form_Element_Text('Description', NULL, '这里是援军的博客，欢迎来访', _t('Description'), _t('在这里填入Description, 不要用英文引号'));
    
    $form->addInput($logoUrl);
    $form->addInput($userboxpic);
    $form->addInput($userboxhead);
    $form->addInput($favicon);
    $form->addInput($bilibiliindex);
    $form->addInput($musicindex);
    $form->addInput($apid);
    $form->addInput($Description);
    $form->addInput($Keywords);
}


function themeInit($archive)
{
 Helper::options()->commentsAntiSpam = false;
 Helper::options()->commentsMaxNestingLevels = 3;//评论嵌套最大层数，建议不变
}

function is_pjax()
{
    return (isset($_SERVER['HTTP_X_PJAX']) && $_SERVER['HTTP_X_PJAX'] == 'true');//pjax请求判断
}