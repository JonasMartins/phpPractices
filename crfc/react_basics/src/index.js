import React, {Component} from 'react';
import ReactDOM from 'react-dom';

import json from './db.json/';

// components

import Header from './components/header';
import NewsList from './components/news_list ';


class App extends Component {
		
	state = {
		news:json
	}

	render(){
			return (
			<div>
				<Header/>
				<NewsList news={this.state.news}/>
			</div>
			)
		}		
}
ReactDOM.render(<App/>,document.querySelector('#root'));