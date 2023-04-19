import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import Edit from './edit';
import Save from './save';
import './style.scss'

registerBlockType( 'block/redlines', {
	title: __( 'redline' ),
	description: __( 'A redline over content with image' ),
	icon: {
		src: 'chart-line',
		background: '#ce0000',
		foreground: '#fff',
	},
	
	supports: {
		reusable: false,
		html: false,
	},
	attributes: {
		title: {
			type: 'string',
			source: 'html',
			selector: 'h4',
		},
		
		id: {
			type: 'number',
		},
		alt: {
			type: 'string',
			source: 'attribute',
			selector: 'img',
			attribute: 'alt',
			default: '',
		},
		url: {
			type: 'string',
			source: 'attribute',
			selector: 'img',
			attribute: 'src',
		},
	},
	edit: Edit,
	save: Save,
} );
