import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function Save( { attributes } ) {
	const { title, bio, url, alt, id } = attributes;
	return (
		<div { ...useBlockProps.save() } className='redline-container'>
			{ url && (
				<img
					src={ url }
					alt={ alt }
					className="red-line-image"
				/>
			) }
			<RichText.Content tagName="h4" value={ title } />
			
		</div>
	);
}
