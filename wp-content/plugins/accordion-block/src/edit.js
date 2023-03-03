import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';

import { faArrowDown } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { v4 as uuidv4 } from 'uuid';
import { useEffect } from 'react';
import './editor.scss';

export default function Edit({ attributes, setAttributes }) {
	const { question, answer, answerId, arrowId } = attributes;

	useEffect(() => {
		setAttributes({ arrowId: uuidv4(), answerId: uuidv4() });
	}, []);

	return (
		<article className="question-answer">
			<div className="question-container">
				<RichText
					{...useBlockProps()}
					onChange={(value) => setAttributes({ question: value })}
					value={question}
					placeholder={__('Your question text', 'text-box')}
					tagName="h4"
					allowedFormats={['core/bold']}
					className="question heading"
				/>
				<FontAwesomeIcon
					icon={faArrowDown}
					id={arrowId}
					role="button"
				/>
			</div>
			<RichText
				{...useBlockProps()}
				onChange={(value) => setAttributes({ answer: value })}
				value={answer}
				placeholder={__('Your answer text', 'text-box')}
				tagName="p"
				allowedFormats={['core/bold']}
				className="question heading"
				id={answerId}
			/>
		</article>
	);
}
