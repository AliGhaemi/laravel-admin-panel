export default function List({className}) {
    return (
        <ul className={className}>
            {["Added","Updated","Deleted"].map((item) => (
                <li className="border-b border-hover pb-3 mb-3 text-md last:border-none">
                    Recently {item}
                    <ul className="px-3 pt-1 text-sm">
                        <li>
                            <p className="inline mr-1.5 text-xs">{"-> "}</p>first
                        </li>
                        <li>
                            <p className="inline mr-1.5 text-xs">{"-> "}</p>second
                        </li>
                        <li>
                            <p className="inline mr-1.5 text-xs">{"->"}</p>third
                        </li>
                    </ul>
                </li>
            ))}
        </ul>
    )
}
