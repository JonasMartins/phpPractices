import React from 'react';

const PostItem = (props) => {
	return (
		<div>
			Post Detail
			{props.match.params.id}
		</div>
		)
}

export default Posts;