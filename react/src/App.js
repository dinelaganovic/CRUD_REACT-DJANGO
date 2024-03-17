import React, { useState, useEffect } from 'react';

function App() {
  const [items, setItems] = useState([]);
  const [name, setName] = useState('');
  const [editingId, setEditingId] = useState(null);
  const [editingName, setEditingName] = useState('');

  useEffect(() => {
    fetchItems();
  }, []);

  const fetchItems = async () => {
    const response = await fetch('http://127.0.0.1:8000/');
    const data = await response.json();
    setItems(data);
  };

  const addItem = async () => {
    const response = await fetch('http://127.0.0.1:8000/add/', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ name }),
    });
    await response.json();
    fetchItems();
    setName('');
  };

  const updateItem = async () => {
    const response = await fetch(`http://127.0.0.1:8000/updateById/${editingId}/update/`, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ name: editingName }),
    });
    await response.json();
    fetchItems();
    setEditingId(null);
    setEditingName('');
  };

  const deleteItem = async (id) => {
    const response = await fetch(`http://127.0.0.1:8000/deleteById/${id}/delete/`, {
      method: 'DELETE',
    });
    await response.json();
    fetchItems();
  };

  const handleEdit = (id, name) => {
    setEditingId(id);
    setEditingName(name);
  };

  const cancelEdit = () => {
    setEditingId(null);
    setEditingName('');
  };

  return (
    <div>
      <h1>Items</h1>
      <input
        type="text"
        placeholder="Enter name"
        value={name}
        onChange={(e) => setName(e.target.value)}
      />
      {editingId ? (
        <>
          <button onClick={updateItem}>Update</button>
          <button onClick={cancelEdit}>Cancel</button>
        </>
      ) : (
        <button onClick={addItem}>Add</button>
      )}
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          {items.map((item) => (
            <tr key={item.id}>
              <td>{item.id}</td>
              <td>{editingId === item.id ? <input value={editingName} onChange={(e) => setEditingName(e.target.value)} /> : item.name}</td>
              <td>
                {editingId === item.id ? (
                  <>
                    <button onClick={updateItem}>Save</button>
                    <button onClick={cancelEdit}>Cancel</button>
                  </>
                ) : (
                  <>
                    <button onClick={() => handleEdit(item.id, item.name)}>Edit</button>
                    <button onClick={() => deleteItem(item.id)}>Delete</button>
                  </>
                )}
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

export default App;
