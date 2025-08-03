import React from 'react';

function Dashboard() {
  return (
    <div className="flex">
      {/* Sidebar */}
      <div className="w-64 h-screen p-4 text-white bg-gray-800">
        <h2 className="mb-6 text-xl font-bold">Dashboard</h2>
        <ul className="space-y-2">
          <li><a href="#" className="hover:text-gray-300">Home</a></li>
          <li><a href="#" className="hover:text-gray-300">Users</a></li>
          <li><a href="#" className="hover:text-gray-300">Settings</a></li>
        </ul>
      </div>

      {/* Main Content */}
      <div className="flex-1 min-h-screen bg-gray-100">
        <main className="p-6">
          <div className="grid grid-cols-1 gap-6 md:grid-cols-3">
            <div className="p-4 bg-white rounded shadow">
              <h2 className="text-lg font-bold">Users</h2>
              <p>120</p>
            </div>
            <div className="p-4 bg-white rounded shadow">
              <h2 className="text-lg font-bold">Orders</h2>
              <p>85</p>
            </div>
            <div className="p-4 bg-white rounded shadow">
              <h2 className="text-lg font-bold">Revenue</h2>
              <p>$4,320</p>
            </div>
          </div>
        </main>
      </div>
    </div>
  );
}

export default Dashboard;
