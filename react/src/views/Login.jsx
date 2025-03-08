import {useStateContext} from "../contexts/ContextProvider.jsx";
import {Navigate} from "react-router-dom";

export default function Login() {
    const {token} = useStateContext()

    if (token) {
        return <Navigate to="/dashboard"/>;
    }
    return (
        <>
            login
        </>
    )
}
