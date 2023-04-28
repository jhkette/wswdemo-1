import {
	useBlockProps,
	RichText,
	MediaPlaceholder,
} from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { isBlobURL } from '@wordpress/blob';
// eslint-disable-next-line import/no-extraneous-dependencies
import { Spinner, withNotices } from '@wordpress/components';
import './editor.scss';

// https://github.com/alialaa/wp-blocks-course-team-members/tree/block-transforms
// some inspiration for this block comes from the above github repository

/**
 * function that sets up edit appearance in CMS of redline block
 * return @JSX
 */

function Edit( { attributes, setAttributes, noticeOperations, noticeUI } ) {
	const { title, url, alt } = attributes;
	// change title function
	const changeTitle = ( newTitle ) => {
		setAttributes( { title: newTitle } );
	};
	// select image image
	const selectImage = ( image ) => {
		// if it isn't an image or image url set attributes to undefined.
		if ( ! image || ! image.url ) {
			setAttributes( { url: undefined, id: undefined, alt: '' } );
			return;
		}
		// we set the url to the image.url and id to image id and alt to image.alt - these
		// properties are on the image object when it is uploaded
		setAttributes( { url: image.url, id: image.id, alt: image.alt } );
	};
	// if the image is uploaded by url - we add newUrl to property
	// and clear any ealier attributes
	const selectURL = ( newURL ) => {
		setAttributes( {
			url: newURL,
			id: undefined,
			alt: '',
		} );
	};
	const uploadError = ( message ) => {
		// notice operations are props - (ie data)  with wordpress component -
		// here we are using them to send an error message - this will create an error message on the screen
		noticeOperations.removeAllNotices();
		noticeOperations.createErrorNotice( message );
	};
	return (
		<div { ...useBlockProps() } className="redline-container-edit">
			{ url && (
				// when image is uploading we get a blob url -
				// an image stored in the browser - in the process of uploading, so we can display
				// a loading and spinner if this is present
				<div
					className={ `wp-block-blocks-course-team-member-img${
						isBlobURL( url ) ? ' is-loading' : ''
					}` }
				>
					<img src={ url } alt={ alt } />
					{ isBlobURL( url ) && <Spinner /> }
				</div>
			) }
			{ /* media holder */ }
			<MediaPlaceholder
				icon="format-image"
				onSelect={ selectImage }
				onSelectURL={ selectURL }
				onError={ uploadError }
				accept="image/*"
				allowedTypes={ [ 'image' ] }
				disableMediaButtons={ url }
				notices={ noticeUI }
			/>
			{ /* text holder for title of image */ }
			<RichText
				placeholder={ __( 'Title' ) }
				tagName="h4"
				onChange={ changeTitle }
				value={ title }
				allowedFormats={ [] }
			/>
		</div>
	);
}

export default withNotices( Edit );
