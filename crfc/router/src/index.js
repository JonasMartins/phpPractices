import React from 'react';
import ReactDom from 'react-dom';
import { HashRouter,Route,Link } from 'react-router-dom';

// MemoryRouter esconde toda a url, fica sempre a mesma do home
// compoents
import Home from './components/home';
import Posts from './components/posts';
import Profile from './components/profile';
import PostItem from './components/post_item';

const App = () => {
	return (
		<HashRouter>
			<div>
				<header>
					<Link to="/">Home</Link><br/>
					<Link to="/posts">Posts</Link><br/>
					<Link to={{
						pathname:'/prfiles'
					}}>Profile</Link><br/> 
					<hr/>
				</header>
				<Route path="/" exact component={Home}/>
				<Route path="/posts" exact component={Posts}/>
				<Route path="/posts/:id" component={PostsItem}/>
				<Route path="/profiles" component={Profile}/>
			</div>
		</HashRouter>

		)
}

ReactDom.render(
	<App/>,
	document.querySelector('#root')

)