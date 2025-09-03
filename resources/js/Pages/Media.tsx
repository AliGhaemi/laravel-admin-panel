import {Head} from "@inertiajs/react";
import {MediaPaths as MediaPathsType} from "@/types";

interface Props {
    media_paths: MediaPathsType
}

export default function Media({media_paths}: Props) {
    return (
        <div className="h-screen flex items-center justify-center">
            <Head title="Media"/>
            <div className="flex flex-col px-10">
                <h3 className="text-4xl mb-5">{media_paths.name}</h3>
                <ul className="grid grid-cols-8 gap-5">
                    {media_paths.content.map((item, index) => (
                        <li>
                            <img src={item} alt={'image_' + index}/>
                        </li>
                    ))}
                </ul>
            </div>
        </div>
    )
}
