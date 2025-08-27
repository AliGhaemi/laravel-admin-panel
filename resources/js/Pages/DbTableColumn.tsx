import React, {useEffect, useState} from "react";
import {Link} from "@inertiajs/react";

type columnsType = {
    [key: string]: any;
};
type columnRowsType = {
    [key: string]: any;
};

export default function DbTableColumn(props) {

    const [columns, setColumns] = useState<columnsType[]>(props.columns);
    const [columnRows, setColumnRows] = useState<columnRowsType[]>(props.columnRows);
    const [isLoading, setIsLoading] = useState(true);

    // setColumnRows(props.columnRows)
    // console.log(props.columns)
    // console.log(props.columnRows)

    useEffect(() => {
        const filteredColumns = columns.filter(item => item !== "id");
        setColumns(["id", ...filteredColumns])
        setIsLoading(false);
    }, [])

    return (
        <div className="overflow-x-auto">
            {columns && columns.length > 0 ? (
                <table className="table-auto h-28">
                    <thead className="uppercase">
                    <tr>
                        {columns.map((column, index) => (
                            <th key={index} scope="col" className="px-6 py-3 text-left">{column}</th>
                        ))}
                        <th scope="col" className="px-6 py-3 text-left ml-auto">Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    {columnRows.data.map((row, index) => (
                        <tr key={index}>
                            {row.id == "id" ?
                                <th scope="row">{row.id}</th>
                                :
                                Object.values(row).map((rowItem, index) => (
                                    <td key={index} className="px-6 py-4">{rowItem}</td>
                                ))
                            }
                            <td className="px-6 py-4 grid grid-cols-2 gap-3 w-72 text-primary font-bold">
                                <Link
                                    href={`${window.location.pathname}/${row.id}`}
                                    className="bg-sky-400 rounded-md px-4 py-2 hover:bg-hover hover:cursor-pointer"
                                >
                                    Edit
                                </Link>
                                <p className="bg-red-400 rounded-md px-4 py-2 hover:bg-hover hover:cursor-pointer">Delete</p>
                            </td>
                        </tr>
                    ))}
                    </tbody>
                </table>
            ) : (
                <p>Loading...</p>
            )}
        </div>
    );
}
