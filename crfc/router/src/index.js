import React from 'react';
import ReactDom from 'react-dom';
import { HashRouter,Route,Link,Switch } from 'react-router-dom';

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
				<Switch>
					<Route path="/posts/:id" component={PostsItem}/>
					<Route path="/profiles" component={Profile}/>
					<Route path="/posts" component={Posts}/>
					<Route path="/" component={Home}/>
				 	<Route component={Posts}/>
				 {/* enciando as menos especificas routes para o final da cadeia de links, apenas assim
				 para funcionar corretamente*/}
				</Switch>

			</div>
		</HashRouter>

		)
}

ReactDom.render(
	<App/>,
	document.querySelector('#root')

)