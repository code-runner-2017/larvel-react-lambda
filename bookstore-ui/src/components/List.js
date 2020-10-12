import React from 'react';
const List = (props) => {
  const { books } = props;
  if (!books || books.length === 0) return <p>No books, sorry</p>;
  return (
    <ul>
      <h2 className='list-head'>Available Books</h2>
      {books.map((book) => {
        return (
          <li key={book.id} className='list'>
              <div>
                <span className='repo-title'>{book.title} </span>
                (<span className='repo-author'>{book.author_name}</span>)
            </div>
            <img className='repo-img' src={book.cover_url}/>
          </li>
        );
      })}
    </ul>
  );
};
export default List;