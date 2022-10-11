import React, { useEffect, useState } from "react";
import { Link, useNavigate } from "react-router-dom";
import DataTable, { TableColumn } from "react-data-table-component";
import { toast } from 'react-toastify';

import axios from '@/axios';
import { useAppSelector } from '@/redux/hooks';
import LoadingSpin from "@/components/LoadingSpin";

interface Umkm {
  id: number,
  name: string,
  pemilik: string,
  jenisUsaha: string,
}

export default function DataUmkm() {
    const columns: TableColumn<Umkm>[] = [
        {
            name: "#",
            cell: (_, index) => index+1,
            width: "3.5rem",
            center: true
        },
        {
            name: "Nama",
            selector: (row) => row.name,
            wrap: true
        },
        {
            name: "Pemilik",
            selector: (row) => row.pemilik,
        },
        {
            name: "Jenis Usaha",
            selector: (row) => row.jenisUsaha,
        }
    ];

    const token = useAppSelector(state => state.auth.token)
    const navigate = useNavigate();

    const [ umkms, setUmkms ] = useState<Umkm[]>([])
    const [ isLoading, setLoading ] = useState(true)

    useEffect(() => {

        const fetchData = async () => {
            setLoading(true);
            try {
                const response = await axios({
                    url: '/umkm',
                    headers: {
                        Authorization: `Bearer ${ token }`
                    }
                })
                setUmkms(response.data)
            } catch (e: any) {
                console.log(e.response)
                toast.error("Terjadi kesalahan. Silakan coba lagi");
            } finally {
                setLoading(false)
            }
        }

        fetchData()
    }, []);

    return (
        <>
            <h3 className="text-gray-700 text-3xl font-medium">Data UMKM</h3>
            <div className="flex flex-col mt-4">
                <div>
                    <Link to="tambah" className="btn px-3 py-2 font-medium inline">
                        Tambah UMKM
                    </Link>
                </div>

                <div className="w-full p-4 rounded-md bg-white mt-4">
                  <DataTable 
                    columns={ columns } 
                    data={ umkms } 
                    progressPending={ isLoading } 
                    progressComponent={ <div className="flex flex-col items-center"><LoadingSpin />Loading...</div> }
                    pagination
                    onRowClicked={(umkm) => navigate(`edit/${ umkm.id }`)}
                />
                </div>
            </div>
        </>
    );
}
