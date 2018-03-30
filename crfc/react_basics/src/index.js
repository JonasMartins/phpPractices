import React, {Component} from 'react';
import ReactDOM from 'react-dom';

import json from './db.json';

// components

import Header from './components/header';
import NewsList from './components/news_list';


class App extends Component {
		
	state = {
		news:json,
		filtered:[]
	}

	getKeyword = (event) => {
		//console.log(event.target.value)
		
		let keyword = event.target.value
		// filter is a ES6 function 
		let matches = this.state.news.filter((item)=>{
			// if matches the title will be return true 		
			return item.title.indexOf(keyword) > -1
		});
		// console.log(filtered)
		this.setState({
			filtered:matches
		})
	}

	render(){
			let newsFiltered = this.state.filtered;
			let allNews = this.state.news;
			return (
			<div>
				<Header keyword={this.getKeyword}/>
				<NewsList news={newsFiltered.length === 0 ? allNews:newsFiltered}>
					Testing childrem props
				</NewsList>
			</div>
			)
		}		
}
ReactDOM.render(<App/>,document.querySelector('#root'));