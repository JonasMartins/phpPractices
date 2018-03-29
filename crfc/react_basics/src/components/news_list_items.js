import React from 'react';
import classes from '../css/styles.css';

const NewsItem = (props) => {

	return (
			<div className={classes.news_item}>
				<h3>{props.item.title}</h3>
				<div>
					{props.item.feed}
				</div>
			</div>
		)
}

export default NewsItem;

