import React, { useEffect, useState } from "react";
import DataTable from "react-data-table-component";

import axios from '@/axios'

interface ColumnWarga {
  sequence: number,
  name: string,
  email: string
}

export default function DataWarga() {
    const columns = [
        {
            name: "No",
            selector: (row: ColumnWarga) => row.sequence,
        },
        {
            name: "Nama",
            selector: (row: ColumnWarga) => row.name,
        },
        {
            name: "Email",
            selector: (row: ColumnWarga) => row.email,
        },
    ];

    const [ wargas, setWargas ] = useState<ColumnWarga[]>([])

    useEffect(() => {

        const fetchData = async () => {
            try {
                await new Promise(r => setTimeout(r, 3000))
            } catch (e: any) {

            } finally {

            }
        }

        fetchData()
    }, []);

    return (
        <>
            <h3 className="text-gray-700 text-3xl font-medium">Data Warga</h3>
            <div className="flex flex-col mt-4">
                <div>
                    {/* <button className="btn px-3 py-2 font-medium">
                        Tambah Warga
                    </button> */}
                </div>

                <div className="w-full p-4 rounded-md bg-white mt-4">
                  <DataTable columns={ columns } data={ wargas } selectableRows pagination />
                </div>
            </div>
        </>
    );
}
