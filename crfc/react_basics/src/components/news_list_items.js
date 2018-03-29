import React from 'react';
import {css} from 'glamor';

const NewsItem = (props) => {

	let news_item = css({
		padding:'20px',
		boxSizing:'border-box',
		borderBottom:'1px solid grey',
		':hover':{
			color:'red'
		},
		'@media(max-width:500px)':{
			color:'blue'
		}
	})


	return (
			<div className={`${news_item}`}>
				<h3>{props.item.title}</h3>
				<div>
					{props.item.feed}
				</div>
			</div>
		)
}

export default NewsItem;

