import {usePage} from "@inertiajs/react";
import {useState} from "react";

export default function List({className}) {

    const {recent_created, recent_updated, recent_deleted} = usePage().props;

    const [recentCrud, setRecentCrud] = useState([
        recent_created,
        recent_updated,
        recent_deleted,
    ]);
    console.log(recentCrud)
    return (
        <ul className={className}>
            {recentCrud.map((item) => (
                <li className="border-b border-hover pb-3 mb-3 text-md last:border-none">
                    Recently {item.type}
                    <ul className="px-3 pt-1 text-sm">
                        {item[0].map((crudItem) => (
                            <>
                                <li>
                                    <p className="inline mr-1.5 text-xs">{"-> "}</p>
                                    <a href="#" className="text-blue-600 dark:text-blue-500 hover:underline">
                                        {
                                            crudItem.loggable == null ?
                                                "no rows found in this model"
                                                :
                                                crudItem.loggable_type
                                        }
                                    </a>
                                </li>
                            </>
                        ))}
                    </ul>
                </li>
            ))}
        </ul>
    )
}
