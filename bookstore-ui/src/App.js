import React, { useEffect, useState } from 'react';
import axios from 'axios';
import './App.css';
import List from './components/List';
import withListLoading from './hoc/withListLoading';

function App() {
  const ListLoading = withListLoading(List);
  const [appState, setAppState] = useState({
    loading: false,
    repos: null,
  });

  useEffect(() => {
    setAppState({ loading: true });
    const apiUrl = process.env.REACT_APP_API_URL + '/api/books';
    
    axios.get(apiUrl).then((books) => {
      const allBooks = books.data;      
      setAppState({ loading: false, books: allBooks });
    });
  }, [setAppState]);
  return (
    <div className='App'>
      <div className='container'>
        <h1>My Books</h1>
      </div>
      <div className='repo-container'>
        <ListLoading isLoading={appState.loading} books={appState.books} />
      </div>
      <footer>
        <div className='footer'>
          Built by Pietro Iglio
        </div>
      </footer>
    </div>
  );
}

export default App;