import { useBlockProps, RichText } from '@wordpress/block-editor';

/**
 * function that sets final appearance of redline block
 * return @JSX
 */

export default function Save( { attributes } ) {
	const { title, url, alt } = attributes;
	return (
		<div { ...useBlockProps.save() } className="redline-container">
			{ /* check for url property to show image (as we need to a url to show it) */ }
			{ url && (
				<img src={ url } alt={ alt } className="red-line-image" />
			) }
			<RichText.Content tagName="h4" value={ title } />
		</div>
	);
}
