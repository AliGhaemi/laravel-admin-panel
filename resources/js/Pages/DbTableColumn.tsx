import React, {useState} from "react";

export default function DbTableColumn({columns, columnRows}) {
    console.log(columns)
    console.log(columnRows)
    return (
        <table className="table-auto">
            <thead className="uppercase">
            <tr>
                {columns.map((column, index) => (
                    <th scope="col" className="px-6 py-3">{column}</th>
                ))}
            </tr>
            </thead>

            <tbody>
            {columnRows.data.map((row, index) => (
                console.log(row)
                // <tr key={index}>
                //     <th scope="row">{row.id}</th>
                //     {
                //         row.map((rowItem, index) => (
                //             <td className="px-6 py-4">{rowItem}</td>
                //         ))
                //     }
                // </tr>
            ))}
            </tbody>
        </table>
    );
}
