import { registerBlockType } from '@wordpress/blocks';
import Edit from './edit';
import Save from './save';
import './style.scss';

registerBlockType('block/accordion', {
	edit: Edit,
	save: Save,
	attributes: {
		question: {
			type: 'string',
			source: 'html',
			selector: 'h4',
		},
		answer: {
			type: 'string',
			source: 'html',
			selector: 'p',
		},
		answerId: {
			type: 'string',
		},
		arrowId: {
			type: 'string',
		},
	},
});
