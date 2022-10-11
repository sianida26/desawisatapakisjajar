import React, { useEffect } from "react";
import { useNavigate } from "react-router-dom";

import { useAppDispatch } from "@/redux/hooks";
import { logout } from "@/redux/slices/authSlice";

export default function Logout() {

    const dispatch = useAppDispatch()
    const navigate = useNavigate()

    useEffect(() => {
        dispatch(logout())
        navigate('/')
    }, [])

    return <div>Logging out...</div>;
}
