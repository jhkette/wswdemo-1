import { useBlockProps, RichText } from '@wordpress/block-editor';
import { faArrowDown } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';

export default function save({ attributes }) {
	const { question, answer, answerId, arrowId } = attributes;

	return (
		<article className="question-answer">
			<div className="question-container">
				<RichText.Content
					{...useBlockProps.save()}
					tagName="h4"
					value={question}
				/>
				<FontAwesomeIcon
					icon={faArrowDown}
					id={arrowId}
					role="button"
				/>
			</div>
			<RichText.Content
				{...useBlockProps.save()}
				tagName="p"
				value={answer}
				className="answer-container"
				id={answerId}
			/>
		</article>
	);
}
