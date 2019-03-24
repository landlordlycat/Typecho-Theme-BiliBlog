<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php if (!is_pjax()):?>
<?php $this->need('header.php'); ?>
<?php endif;?>

<!--中间部分-->             
                        <script>
                            $(document).attr("title","<?php $this->title()?>");
                            $('#post-category').html("<!-- index-menu -->");
                            if($(document).width()<800){
                            $('#smartFloat').css({'display':'none'});
                            $('#ownerinfo').hide();
                            $("#Comments_Recent,#Post_Recent").hide();
                            }else{
                                $('#smartFloat').show();
                            };
                        </script>
                            <!--面包屑导航-->
                            <div class="row clearfix">
                                <div class="<?php if (!is_pjax()):?>
                                            col-md-8 column col-md-offset-1
                                            <?php else:?>
                                            col-md-12 column
                                            <?php endif;?>" style="margin-bottom: -32px;">
                                    <div class="breadcrumb">
                                        当前位置：<a href="<?php $this->options->siteUrl(); ?>" class="a">主页</a> &raquo;</li>
	                                    <?php if ($this->is('index')): ?><!-- 页面为首页时 -->
		                                最新文章
	                                    <?php elseif ($this->is('post')): ?><!-- 页面为文章单页时 -->
		                                <?php $this->category(); ?> &raquo; <?php $this->title() ?>
	                                    <?php else: ?><!-- 页面为其他页时 -->
		                                <?php $this->archiveTitle(' &raquo; ','',''); ?>
	                                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <!--文章主体-->
                            <div class="row clearfix" >
                                <div class="<?php if (!is_pjax()):?>
                                            col-md-8 column col-md-offset-1
                                            <?php else:?>
                                            col-md-12 column
                                            <?php endif;?>">
                                    <article class="post" style="background-color:#fff;border-radius:8px;box-shadow: 0px 0px 8px 1px rgba(0, 0, 0, 0.09);">
                                                <div class="post-head blur" style="background-image: url(<?php $this->fields->thumb(); ?>);background-position-x:center;background-position-y:center;width:100%;height:100px;">
                                                </div>
                                                <h1 class="post-title" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
                                              <ul class="post-meta">
                                                <li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?>
                                                <a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a>
                                                </li>
                                                <li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>
                                                </li>
                                                <li><?php _e('分类: '); ?><?php $this->category(','); ?>
                                                </li>
                                                <li>
                                                    <?php if($this->user->hasLogin()):?>
                                                    <a href="/admin/write-post.php?cid=<?php echo $this->cid;?>" target="_blank">编辑</a>
                                                    <?php endif;?>
                                                </li>    
                                              </ul>
                                              <div class="post-content" itemprop="articleBody">
                                                <?php $this->content(); ?>
                                              
                                            <p itemprop="keywords" class="post-tags"><?php $this->tags('  ', true, 'none'); ?> &nbsp;&nbsp;
                                            <a class="btn-like" data-cid="<?php $this->cid();?>" data-num="<?php $this->likesNum();?>">
                                                <i  class="like-ico"></i>
                                                <span class="post-likes-num">
                                                <?php $this->likesNum();?></span>
                                            </a>
                                            </p>
                                            </div>
                                    </article>
                                        <ul class="post-near">
                                        <li style="min-width: 45%;text-overflow:ellipsis;">上一篇: <?php $this->thePrev('%s','没啦'); ?></li>
                                        <li style="float: right;width: 45%;text-overflow:ellipsis;">下一篇: <?php $this->theNext('%s','没啦'); ?></li>
                                        </ul>
                                        <?php $this->need('comments.php'); ?>
                                        
                                        <script>
                                        var imgs=$(".post-content img:not(.smilies)");
                                        for(i=0;i<imgs.length;i++){
                                            var imgs=$(".post-content img:not(.smilies)");
                                            imgs[i].outerHTML= '<a href="' + imgs[i].src +' "data-fancybox="images" data-caption="' + imgs[i].alt + '" >' + '<div class="post-img"><img data-original="'+imgs[i].src+'" src="https://i.loli.net/2018/10/30/5bd8193caea80.gif" class="lazyload" alt="'+ imgs[i].alt +'" title="'+ imgs[i].title +'"></div>' + '<\/a>';
                                        };
                                        $('[data-fancybox="images"]').fancybox({
    	                                    'transitionIn': 'elastic', //窗口显示的方式 
                                            'transitionOut': 'elastic'
                                        });
                                        $("img.lazyload").lazyload({effect:'fadeIn'});
                                        </script>
                                </div>
                            </div>
                        </div>


<!--</div> end #main-->
<?php if (!is_pjax()):?>
<?php $this->need('footer.php'); ?>
<?php endif;?>