<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Пожалуйста, не загружайте данную страницу напрямую. Спасибо!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">Эта запись защищена пароль. Введите пароль, чтобы добавить комментарий</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->
<div class="commentsMain">
<?php if ( have_comments() ) : ?>

	<h3><?php comments_number('Нет Откликов', 'Один Отклик', '% Отклика(ов)' );?> на &#8220;<?php the_title(); ?>&#8221;</h3>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

  <div class="commWrap">
   <div class="postMain"></div>
	<div class="postcom">
    <ol class="commentlist">
      <?php wp_list_comments('type=comment&avatar_size=64'); ?>
    </ol>
    </div><div style="clear:both"></div>
	 <div class="postFoot"></div>
  </div>
  <div class="commFoot"></div>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->


	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
<div class="postMainComment">      <!-- Post Block Wrapper -->
   <div class="postMain"></div>
	<div class="postcom">
 <div class="commentsPosts">      <!-- Post Contents -->
<div id="respond">

<h2 id="commentshead"><?php comment_form_title( 'Оставить ответ', 'Оставить ответ на %s' ); ?></h2>

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Вы должны <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">войти</a>, чтобы добавить комментарий.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Вы вошли как <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Выйти из этого аккаунта">Выйти &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author">Имя <?php if ($req) echo "(required)"; ?></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email">Mail (не публикуется) <?php if ($req) echo "(required)"; ?></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url">Веб-сайт</label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" cols="80%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" tabindex="5" id="submitcomment" value="Отправить" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>
</div>      <!-- / Post Contents End -->
                                         </div>     <!-- / Post Block Wrapper End -->
                                          </div><div style="clear:both"></div>
	 <div class="postFoot"></div>


  <!--[if IE 7]>
 <span style="clear:both"></span>
<![endif]-->
<div style="clear:both"></div>



<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
</div>