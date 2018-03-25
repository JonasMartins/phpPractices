import React from 'react';
 
// we can say like {item} instead of props, and remove props from below
// this way is a little bit simple, a less confusing i guess
const NewsItem = (props) => {
	return (
			<div>
				<h3>{props.item.title}</h3>
				<div>
					{props.item.feed}
				</div>
			</div>
		)
}

export default NewsItem;

