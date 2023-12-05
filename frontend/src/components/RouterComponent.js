import React from "react";
import { BrowserRouter as Router, Route } from "react-router-dom";
import AdminComponent from "./AdminComponent";
import DoctorComponent from "./DoctorCompoment";
import PatientComponent from "./PatientComponent";

const RouterComponent = () => {
  return (
    <Router>
      <Route path="/admin" component={AdminComponent} />
      <Route path="/doctor" component={DoctorComponent} />
      <Route path="/patient" component={PatientComponent} />
    </Router>
  );
};

export default RouterComponent;
