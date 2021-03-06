<div id="message-thread">

	<?php do_action( 'bp_before_message_thread_content' ); ?>

	<?php if ( bp_thread_has_messages() ) : ?>

		<h3 id="message-subject"><?php bp_the_thread_subject(); ?></h3>

		<p id="message-recipients">
			<span class="highlight">
				<?php
				printf(
					// translators: list of thread recipients
					esc_html__( 'Sent between %1$s', 'commons-in-a-box' ),
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					bp_get_the_thread_recipients()
				);
				?>
				<span class="sep">|</a><a class="delete-button confirm" href="<?php echo esc_attr( bp_get_the_thread_delete_link() ); ?>" title="<?php esc_html_e( 'Delete Message', 'commons-in-a-box' ); ?>"><i class="fa fa-minus-circle"></i><?php esc_html_e( 'Delete', 'commons-in-a-box' ); ?></a>
			</span>
		</p>

		<?php do_action( 'bp_before_message_thread_list' ); ?>

		<?php
		while ( bp_thread_messages() ) :
			bp_thread_the_message();
			?>

			<div class="message-box panel panel-default">

				<div class="panel-body">

					<div class="message-metadata">

						<?php do_action( 'bp_before_message_meta' ); ?>

						<?php bp_the_thread_message_sender_avatar( 'type=thumb&width=30&height=30' ); ?>
						<strong><a href="<?php bp_the_thread_message_sender_link(); ?>" title="<?php bp_the_thread_message_sender_name(); ?>"><?php bp_the_thread_message_sender_name(); ?></a> <span class="activity"><?php bp_the_thread_message_time_since(); ?></span></strong>

						<?php do_action( 'bp_after_message_meta' ); ?>

					</div><!-- .message-metadata -->

					<?php do_action( 'bp_before_message_content' ); ?>

					<div class="message-content">

						<?php bp_the_thread_message_content(); ?>

					</div><!-- .message-content -->

					<?php do_action( 'bp_after_message_content' ); ?>

				</div>

			</div><!-- .message-box -->

		<?php endwhile; ?>

		<?php do_action( 'bp_after_message_thread_list' ); ?>

		<?php do_action( 'bp_before_message_thread_reply' ); ?>

		<form id="send-reply" action="<?php bp_messages_form_action(); ?>" method="post" class="standard-form form-panel">

			<div class="message-box panel panel-default">
				<div class="panel-heading semibold">
					<div class="message-metadata">

						<?php do_action( 'bp_before_message_meta' ); ?>

						<div class="avatar-box">
							<?php bp_loggedin_user_avatar( 'type=thumb&height=30&width=30' ); ?>

							<strong><?php esc_html_e( 'Send a Reply', 'commons-in-a-box' ); ?></strong>
						</div>

						<?php do_action( 'bp_after_message_meta' ); ?>

					</div><!-- .message-metadata -->
				</div>

				<div class="panel-body">
					<div class="message-content">

						<?php do_action( 'bp_before_message_reply_box' ); ?>

						<textarea class="form-control" name="content" id="message_content" rows="15" cols="40"></textarea>

						<?php do_action( 'bp_after_message_reply_box' ); ?>

						<div class="submit">
							<input class="btn btn-primary" type="submit" name="send" value="<?php esc_html_e( 'Send Reply', 'commons-in-a-box' ); ?> &rarr;" id="send_reply_button"/>
							<span class="ajax-loader"></span>
						</div>

						<input type="hidden" id="thread_id" name="thread_id" value="<?php bp_the_thread_id(); ?>" />
						<?php wp_nonce_field( 'messages_send_message', 'send_message_nonce' ); ?>

					</div><!-- .message-content -->
				</div>

			</div><!-- .message-box -->

		</form><!-- #send-reply -->

		<?php do_action( 'bp_after_message_thread_reply' ); ?>

	<?php endif; ?>

	<?php do_action( 'bp_after_message_thread_content' ); ?>

</div>
