import {
	useBlockProps,
	RichText,
	MediaPlaceholder,
} from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { isBlobURL } from '@wordpress/blob';
import { Spinner, withNotices } from '@wordpress/components';
import './editor.scss'

function Edit( { attributes, setAttributes, noticeOperations, noticeUI } ) {
	const { title, url, alt } = attributes;
	const changeTitle = ( newTitle ) => {
		setAttributes( { title: newTitle } );
	};

	const selectImage = ( image ) => {
		if ( ! image || ! image.url ) {
			setAttributes( { url: undefined, id: undefined, alt: '' } );
			return;
		}
		setAttributes( { url: image.url, id: image.id, alt: image.alt } );
	};
	const selectURL = ( newURL ) => {
		setAttributes( {
			url: newURL,
			id: undefined,
			alt: '',
		} );
	};
	const uploadError = ( message ) => {
		noticeOperations.removeAllNotices();
		noticeOperations.createErrorNotice( message );
	};
	return (
		<div { ...useBlockProps() } className='redline-container-edit'>
			{ url && (
				<div
					className={ `wp-block-blocks-course-team-member-img${
						isBlobURL( url ) ? ' is-loading' : ''
					}` }
				>
					<img src={ url } alt={ alt } />
					{ isBlobURL( url ) && <Spinner /> }
				</div>
			) }
			<MediaPlaceholder
				icon="admin-users"
				onSelect={ selectImage }
				onSelectURL={ selectURL }
				onError={ uploadError }
				accept="image/*"
				allowedTypes={ [ 'image' ] }
				disableMediaButtons={ url }
				notices={ noticeUI }
			/>
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
