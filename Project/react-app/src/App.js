import './App.css';
import './static/css/style.css'
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Navbar from './components/Navbar';
import Index from './components/Index';
import About_us from './components/About_us';
import Contact_us from './components/Contact_us';
import Types_of_Services from './components/Types_of_Services';

function App() {
  return (
    <div className="App">
      <Navbar></Navbar>
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<Index/>}></Route>
          <Route path="/about_us" element={<About_us/>}></Route>
          <Route path="/contact_us" element={<Contact_us/>}></Route>
          <Route path="/types_of_services" element={<Types_of_Services/>}></Route>
        </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;
