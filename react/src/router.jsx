import {createBrowserRouter} from "react-router-dom"
import Login from "./views/login.jsx";
import NotFound from "./views/NotFound.jsx";
import DefaultLayout from "./components/DefaultLayout.jsx";
import Users from "./views/Users.jsx";
import Dashboard from "./views/Dashboard.jsx";

const router = createBrowserRouter([
    {
        path: '/',
        element: <Login/>
    },
    {
        path: '*',
        element: <NotFound/>
    },
    {
        path: '/',
        element: <DefaultLayout/>,
        children: [
            {
                path: '/users',
                element: <Users/>
            },
            {
                path: '/dashboard',
                element: <Dashboard/>
            },
        ]
    },
])

export default router;
