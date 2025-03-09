import {useState} from "react";
import {useStateContext} from "../contexts/ContextProvider.jsx";
import {Navigate} from "react-router-dom";
import axiosClient from "../axios.js";

export default function Login() {
    const {token, user, setToken, setUser} = useStateContext();
    const [username, setUsername] = useState("");
    const [password, setPassword] = useState("");
    const [error, setError] = useState("");

    if (token) {
        return <Navigate to="/dashboard"/>;
    }

    const handleSubmit = (e) => {
        e.preventDefault();
        setError("");

        axiosClient.post("/login", {username, password})
            .then(({data}) => {
                setToken(data.token);
                setUser(data.user);
            })
            .catch(err => {
                const response = err.response;
                if (response && response.status === 442) {
                    console.log(response.data.errors);
                }
            })
    };

    return (
        <div className="container vh-100 d-flex justify-content-center align-items-center">
            <div className="card shadow p-4" style={{width: "350px"}}>
                <h1 className="text-center mb-4">Login</h1>
                {error && <div className="alert alert-danger">{error}</div>}
                <form onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <label htmlFor="email" className="form-label">Username</label>
                        <input
                            type="text"
                            className="form-control"
                            id="email"
                            placeholder="Enter your email"
                            value={username}
                            onChange={(e) => setUsername(e.target.value)}
                            required
                        />
                    </div>
                    <div className="mb-3">
                        <label htmlFor="password" className="form-label">Password</label>
                        <input
                            type="password"
                            className="form-control"
                            id="password"
                            placeholder="Enter your password"
                            value={password}
                            onChange={(e) => setPassword(e.target.value)}
                            required
                        />
                    </div>
                    <button type="submit" className="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    );
}
