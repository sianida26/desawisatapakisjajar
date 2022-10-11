import React from 'react'

import {
  BrowserRouter,
  Routes,
  Navigate,
  Route
} from 'react-router-dom'

import Login from '@/pages/Login';
import Logout from '@/pages/Logout';
import Register from '@/pages/Register';
import DataWarga from '@/pages/DataWarga';
import DataUmkm from '@/pages/DataUmkm';
import FormUmkm from '@/pages/FormUmkm';

import AppLayout from '@/layouts/AppLayout';

import { useAppSelector } from '@/redux/hooks';

export default function App() {

  //logged in if token is not empty
  const isLoggedIn = !!useAppSelector(state => state.auth.token);

  //routes for unauthenticated visitors
  const guestRoutes = (
    <>
      <Route path="/" element={<Navigate to="/login" />} />
      <Route path="/login" element={<Login />} />
      <Route path="/register" element={<Register />} />
    </>
  )

  //routes for authenticated users
  const protectedRoutes = (
    <>
      {/* <Route path="/" element={<Navigate to="/warga" />} /> */}
      <Route path="/login" element={<Navigate to="/" />} />
      <Route path="/logout" element={<Logout />} />
      <Route path="/register" element={<Navigate to="/" />} />
      <Route path="/" element={ <AppLayout />}>
        <Route index element={<Navigate to="/warga" /> } />
        <Route path="/warga" element={ <DataWarga /> } />
        <Route path="/umkm" element={ <DataUmkm /> } />
        <Route path="/umkm/tambah" element={ <FormUmkm isEdit={ false } /> } />
        <Route path="/umkm/edit/:id" element={ <FormUmkm isEdit={ true } /> } />
      </Route>
    </>
  )

  return (
    <BrowserRouter basename='/admin'>
      <Routes>
        {
          isLoggedIn ? protectedRoutes : guestRoutes
        }
      </Routes>
    </BrowserRouter>
  )
}
