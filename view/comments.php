<?php
namespace FakerPress;

$fields[] = new Field(
	'range',
	'qty',
	array(
		'label' => __( 'Quantity', 'fakerpress' ),
		'description' => __( 'How many comments should be generated, use both fields to get a randomized number of comments within the given range.', 'fakerpress' ),
	)
);

$fields[] = new Field(
	'checkbox',
	array(
		'id' => 'use_html',
		'value' => 1,
		'options' => array(
			array(
				'text' => __( 'Use HTML on your randomized comment content?', 'fakerpress' ),
				'value' => 1,
			),
		),
	),
	array(
		'label' => __( 'Use HTML', 'fakerpress' ),
	)
);

$_elements = array_merge( \Faker\Provider\HTML::$sets['header'], \Faker\Provider\HTML::$sets['list'], \Faker\Provider\HTML::$sets['block'] );
$fields[] = new Field(
	'dropdown',
	array(
		'id' => 'html_tags',
		'multiple' => true,
		'data-options' => $_elements,
		'data-tags' => true,
		'value' => implode( ',', $_elements ),
	),
	array(
		'label' => __( 'HTML tags', 'fakerpress' ),
		'description' => __( 'Select the group of tags that can be selected to print on the Comment Content.', 'fakerpress' ),
	)
);

$fields[] = new Field(
	'interval',
	'interval_date',
	array(
		'label' => __( 'Date', 'fakerpress' ),
		'description' => __( 'Choose the range for the posts dates.', 'fakerpress' ),
	)
);

/*
<tr class='fk-field-container fk-field-dependent' data-fk-depends=".field-container-comment_content_use_html input" data-fk-condition='true'>
 */
?>

<div class='wrap'>
	<h2><?php echo esc_attr( Admin::$view->title ); ?></h2>

	<form method='post'>
		<?php wp_nonce_field( Plugin::$slug . '.request.' . Admin::$view->slug . ( isset( Admin::$view->action ) ? '.' . Admin::$view->action : '' ) ); ?>
		<table class="form-table" style="display: table;">
			<tbody>
				<?php foreach ( $fields as $field ) { $field->output( true ); } ?>
			</tbody>
		</table>
		<?php submit_button( __( 'Generate', 'fakerpress' ), 'primary' ); ?>
	</form>
</div>