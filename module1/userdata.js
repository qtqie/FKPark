// Sample user data
const users = [
    { id: 1, name: "Alice", email: "alice@example.com" },
    { id: 2, name: "Bob", email: "bob@example.com" },
    { id: 3, name: "Charlie", email: "charlie@example.com" }
];

// Function to display user data
function displayUserData(users) {
    const userDataDiv = document.getElementById('user-data');
    let table = '<table>';
    table += '<tr><th>ID</th><th>Name</th><th>Email</th></tr>';

    users.forEach(user => {
        table += `<tr><td>${user.id}</td><td>${user.name}</td><td>${user.email}</td></tr>`;
    });

    table += '</table>';
    userDataDiv.innerHTML = table;
}

// Call the function to display data
displayUserData(users);
