import * as React from "react";

function IconSortDescending2({
  size = 24,
  color = "currentColor",
  stroke = 2,
  ...props
}) {
  return <svg className="icon icon-tabler icon-tabler-sort-descending-2" width={size} height={size} viewBox="0 0 24 24" strokeWidth={stroke} stroke={color} fill="none" strokeLinecap="round" strokeLinejoin="round" {...props}><path stroke="none" d="M0 0h24v24H0z" fill="none" /><rect x={5} y={5} width={5} height={5} rx={0.5} /><rect x={5} y={14} width={5} height={5} rx={0.5} /><path d="M14 15l3 3l3 -3" /><path d="M17 18v-12" /></svg>;
}

export default IconSortDescending2;