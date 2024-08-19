import React from 'react'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import Table from '@/Components/Table';
import { Head } from '@inertiajs/react';
function Users({ user, users }) {
    console.log(user);
  return (
    <AuthenticatedLayout 
    user={user}
    header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
    >
        <Head title="Users" />
    <div>
       <h2 className='text-2xl font-medium text-center'>User Management</h2>

    <Table users={ users } />
    </div>
    </AuthenticatedLayout>
  )
}

export default Users