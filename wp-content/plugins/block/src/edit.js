/* eslint-disable react-hooks/exhaustive-deps */
import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';
import { faArrowDown } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { v4 as uuidv4 } from 'uuid';
import { useEffect } from 'react';
import './editor.scss';

/**
 * function that sets up edit appearance in CMS of accordion block
 * return @JSX
 */

export default function Edit({ attributes, setAttributes }) {
	// destructure attributes of the block which are defined in index.js
	const { question, answer, answerId, arrowId } = attributes; // destructure attributes of the wp-block
	//  useffect is a React hook ( a function) that runs when the component is rendered
	// here I am using to give the arrowId and answerID a unique id - using the uuid  package. i'm removing hyphens from id.
	useEffect(() => {
		setAttributes({
			arrowId: uuidv4().replace(/-/g, ''),
			answerId: uuidv4().replace(/-/g, ''),
		});
	}, []);

	return (
		<article className="question-answer-edit">
			<div className="question-container">
				{/* richtext component for question value */}
				<RichText
					{...useBlockProps()}
					onChange={(value) => setAttributes({ question: value })}
					value={question}
					placeholder={__('Your question text', 'text-box')}
					tagName="h4"
					allowedFormats={['core/bold']}
					className="question heading"
				/>
				{/* arrow icon */}
				<FontAwesomeIcon
					icon={faArrowDown}
					id={arrowId}
					role="button"
				/>
			</div>
			{/* richtext component for answer value */}
			<RichText
				{...useBlockProps()}
				onChange={(value) => setAttributes({ answer: value })}
				value={answer}
				placeholder={__('Your answer text', 'text-box')}
				tagName="p"
				className="question-response"
				id={answerId}
			/>
		</article>
	);
}
